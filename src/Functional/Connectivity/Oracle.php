<?php

/**
 * @author Marc MOREAU <moreau.marc.web@gmail.com>
 * @license https://github.com/MockingMagician/coinbase-pro-sdk/blob/master/LICENSE.md MIT
 * @link https://github.com/MockingMagician/coinbase-pro-sdk/blob/master/README.md
 */

namespace MockingMagician\CoinbaseProSdk\Functional\Connectivity;

use MockingMagician\CoinbaseProSdk\Contracts\Connectivity\OracleInterface;
use MockingMagician\CoinbaseProSdk\Contracts\DTO\OracleCryptoSignedPricesInterface;
use MockingMagician\CoinbaseProSdk\Functional\DTO\OracleCryptoSignedPricesData;

class Oracle extends AbstractRequestFactoryAware implements OracleInterface
{
    public function getCryptographicallySignedPricesRaw(): string
    {
        return $this->getRequestFactory()->createRequest('GET', '/oracle')->send();
    }

    /**
     * {@inheritdoc}
     */
    public function getCryptographicallySignedPrices(): OracleCryptoSignedPricesInterface
    {
        return OracleCryptoSignedPricesData::createFromJson($this->getCryptographicallySignedPricesRaw());
    }
}
