<?php

/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * PHP version 5.6+
 *
 * @category  YounitedpaySDK
 * @package   Ecommerceyounitedpaysdk
 * @author    202-ecommerce <tech@202-ecommerce.com>
 * @copyright 2022 (c) 202-ecommerce
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @link      https://api.sandbox-younited-pay.com/
 */

namespace YounitedPaySDK\Adapter;

use Exception;
use YounitedPaySDK\Model\AbstractModel;
use YounitedPaySDK\Request\AbstractRequest;
use YounitedPaySDK\Stream;

/**
 * Abstract Adapter Class
 */
abstract class AbstractAdapter
{
    /**
     * @var string
     */
    protected $request;

    /**
     * @var string
     */
    protected $model;

    /**
     * @var string
     */
    protected $namespace;

    /**
     * @param AbstractModel $model
     *
     * @return AbstractModel
     */
    abstract protected function completeDataModel($model);

    /**
     * @return mixed
     */
    abstract protected function getModelMapping();

    /**
     * @param AbstractRequest $request
     *
     * @throws Exception
     * @return AbstractRequest $request
     */
    protected function convertRequest(AbstractRequest $request)
    {
        $modelStream = $request->getBody();

        $model = $this->convertModel($modelStream);

        $newRequest = (new $this->request())
            ->setModel($model);

        if ($request->isSandboxEnabled()) {
            $newRequest->enableSandbox();
        }

        return $newRequest;
    }

    /**
     * @param null|Stream $modelStream
     *
     * @throws Exception
     * @return AbstractModel
     */
    private function convertModel($modelStream)
    {
        $streamContent = json_decode((string) $modelStream, true);

        $newModel = $this->convertOldModelWithModelMapping($streamContent);

        return $this->completeDataModel($newModel);
    }

    /**
     * @param mixed $oldModel
     *
     * @throws Exception
     * @return AbstractModel
     */
    private function convertOldModelWithModelMapping($oldModel)
    {
        if (false === class_exists($this->model)) {
            throw new Exception(
                'Class "' . $this->model . '" does not exist.'
            );
        }

        $newModel = new $this->model();

        $modelMapping = $this->getModelMapping();
        foreach ($modelMapping as $property => $propertyValue) {
            $propertyValueModel = $this->getPropertyValueFromOldModel($oldModel, $propertyValue);

            if ($propertyValueModel !== null) {
                $setterMethod = 'set' . ucfirst($property);
                if (method_exists($newModel, $setterMethod)) {
                    $newModel->$setterMethod($propertyValueModel);
                }
            }
        }

        return $newModel;
    }

    /**
     * @param mixed $oldModel
     * @param mixed $propertyValue
     *
     * @throws Exception
     * @return mixed
     */
    private function getPropertyValueFromOldModel($oldModel, $propertyValue)
    {
        if (false === is_array($propertyValue)) {
            return $this->getPropertyValueModelFromPath($oldModel, $propertyValue);
        }

        if (isset($propertyValue['className'])) {
            $className = $this->namespace . $propertyValue['className'];

            if (false === class_exists($className)) {
                throw new Exception(
                    'Class "' . $className . '" does not exist.'
                );
            }

            $model = new $className();

            foreach ($propertyValue['properties'] as $subProperty => $subPropertyValue) {
                $subPropertyValueModel = $this->getPropertyValueFromOldModel($oldModel, $subPropertyValue);

                if ($subPropertyValueModel !== null) {
                    $setterMethod = 'set' . ucfirst($subProperty);
                    if (method_exists($model, $setterMethod)) {
                        $model->$setterMethod($subPropertyValueModel);
                    }
                }
            }

            return $model;
        }

        foreach ($propertyValue as $propertyPath => $subPropertyValue) {
            $oldModelValues = $this->getPropertyValueModelFromPath($oldModel, $propertyPath);

            if (empty($oldModelValues)) {
                continue;
            }

            $propertyValueModel = [];
            foreach ($oldModelValues as $oldModelValue) {
                $propertyValueModel[] = $this->getPropertyValueFromOldModel($oldModelValue, $subPropertyValue);
            }

            if (false === empty($propertyValueModel)) {
                return $propertyValueModel;
            }
        }

        return null;
    }

    /**
     * @param mixed $model
     * @param mixed $propertyPath
     *
     * @throws Exception
     * @return mixed
     */
    private function getPropertyValueModelFromPath($model, $propertyPath)
    {
        $propertyValueModel = null;
        $multiPropertyPath = explode('+', $propertyPath);
        foreach ($multiPropertyPath as $multiPropertyPathPart) {
            $modelValue = $model;
            $subPropertyPath = explode('.', $multiPropertyPathPart);
            foreach ($subPropertyPath as $subPropertyPathPart) {
                if (is_array($modelValue) && isset($modelValue[$subPropertyPathPart])) {
                    $modelValue = $modelValue[$subPropertyPathPart];
                } else {
                    $modelValue = null;
                }
            }

            if (empty($modelValue)) {
                continue;
            }

            if (false === empty($propertyValueModel) && is_string($propertyValueModel)) {
                $propertyValueModel .= ' ' . $modelValue;
                continue;
            }

            $propertyValueModel = $modelValue;
        }

        return $propertyValueModel;
    }
}
