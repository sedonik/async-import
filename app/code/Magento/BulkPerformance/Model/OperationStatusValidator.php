<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\BulkPerformance\Model;

use Magento\BulkPerformance\Model\OperationStatusPool;
use Magento\Framework\Exception\NoSuchEntityException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class OperationStatusValidator to validate operation status
 */
class OperationStatusValidator
{
    /**
     * @var OperationStatusPool
     */
    protected $operationStatusPool;

    /**
     * OperationStatusValidator constructor.
     *
     * @param OperationStatusPool $operationStatusPool
     */
    public function __construct(OperationStatusPool $operationStatusPool)
    {
        $this->operationStatusPool = $operationStatusPool;
    }

    /**
     * Validate method
     *
     * @param $status
     */
    public function validate($status)
    {
        $statuses = $this->operationStatusPool->getStatuses();

        if (!in_array($status, $statuses)) {
            throw new \InvalidArgumentException('Invalid Operation Status.');
        }

        return;
    }
}
