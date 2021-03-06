<?php

/**
 * @author Marc MOREAU <moreau.marc.web@gmail.com>
 * @license https://github.com/MockingMagician/coinbase-pro-sdk/blob/master/LICENSE.md MIT
 * @link https://github.com/MockingMagician/coinbase-pro-sdk/blob/master/README.md
 */

namespace MockingMagician\CoinbaseProSdk\Functional\Connectivity;

use MockingMagician\CoinbaseProSdk\Contracts\Connectivity\FeesInterface;
use MockingMagician\CoinbaseProSdk\Contracts\DTO\FeeDataInterface;
use MockingMagician\CoinbaseProSdk\Functional\DTO\FeeData;

class Fees extends AbstractRequestFactoryAware implements FeesInterface
{
    public function getCurrentFeesRaw(): string
    {
        return $this->getRequestFactory()->createRequest('GET', '/fees')->send();
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrentFees(): FeeDataInterface
    {
        return FeeData::createFromJson($this->getCurrentFeesRaw());
    }
}
