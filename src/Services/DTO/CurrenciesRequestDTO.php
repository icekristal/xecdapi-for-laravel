<?php

namespace Icekristal\XecdapiForLaravel\Services\DTO;

use Icekristal\XecdapiForLaravel\Services\DTOBase;
use Illuminate\Support\Collection;

class CurrenciesRequestDTO extends DTOBase
{
    /**
     * @url https://www.xe.com/currency
     * @var string
     */
    protected string $iso;

    /**
     * OPTIONAL – If 'true' then endpoint will display currencies that are obsolete but for which historical data is available
     * @var bool
     */
    protected bool $obsolete = false;

    /**
     * Languages available: ar, de, en, es, fr, it, ja, pt, sv, zh-CN, zh-HK.
     * @var string
     */
    protected string $language = 'en';

    /**
     * OPTIONAL - If 'symbol' then returns 'currency_symbol' and 'currency_symbol_on_right' in response
     * @var string
     */
    protected string $additionalInfo;

    /**
     * OPTIONAL – If 'true' then this endpoint will return data for the following crypto currencies:
     * ADA, BCH, DOGE, DOT, ETH, LINK, LTC, LUNA, UNI, XLM and XRP
     * @var bool
     */
    protected bool $crypto = false;

    /**
     * @param string $iso
     * @return $this
     */
    public function setIso(string $iso): self
    {
        $this->iso = $iso;
        return $this;
    }

    /**
     * @param bool $obsolete
     * @return $this
     */
    public function setObsolete(bool $obsolete): self
    {
        $this->obsolete = $obsolete;
        return $this;
    }

    /**
     * @param string $language
     * @return $this
     */
    public function setLanguage(string $language): self
    {
        $this->language = in_array($language, ['ar', 'de', 'en', 'es', 'fr', 'it', 'ja', 'pt', 'sv', 'zh-CN', 'zh-HK']) ? $language : 'en';
        return $this;
    }

    /**
     * @param string $additionalInfo
     * @return $this
     */
    public function setAdditionalInfo(string $additionalInfo): self
    {
        $this->additionalInfo = $additionalInfo;
        return $this;
    }

    /**
     * @param bool $crypto
     * @return $this
     */
    public function setCrypto(bool $crypto): self
    {
        $this->crypto = $crypto;
        return $this;
    }

}
