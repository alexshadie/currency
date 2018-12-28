<?php
/*
 * This file was generated by modelGen
 * VERSION: c58b306895e4c9c3d8ced1b38b3d780b
 * https://github.com/alexshadie/modelGen
 */

namespace alexshadie\currency;

class FiatCurrencyBuilder 
{
    /** 
     * @var int
     */
    private $id;

    /** 
     * @var string
     */
    private $code;

    /** 
     * @var string
     */
    private $name;

    /** 
     * @var int
     */
    private $unit;

    /** 
     * @var int|null
     */
    private $countryId;

    /** 
     * @var string
     */
    private $countryName;

    public static function fromArray(array $src): FiatCurrencyBuilder
    {
        $builder = new FiatCurrencyBuilder();
        $builder->setId($src["id"] ?? $src[0] ?? 0);
        $builder->setCode($src["code"] ?? $src[1] ?? "");
        $builder->setName($src["name"] ?? $src[2] ?? "");
        $builder->setUnit($src["unit"] ?? $src[3] ?? 0);
        $builder->setCountryId($src["country_id"] ?? $src["countryId"] ?? $src[4] ?? null);
        $builder->setCountryName($src["country_name"] ?? $src["countryName"] ?? $src[5] ?? "");
        return $builder;
    }

    public function create(): FiatCurrency
    {
        return new FiatCurrency(
            $this->id,
            $this->code,
            $this->name,
            $this->unit,
            $this->countryId,
            $this->countryName
        );
    }
    public function setId(int $id): FiatCurrencyBuilder
    {
        $this->id = $id;
        return $this;
    }

    public function setCode(string $code): FiatCurrencyBuilder
    {
        $this->code = $code;
        return $this;
    }

    public function setName(string $name): FiatCurrencyBuilder
    {
        $this->name = $name;
        return $this;
    }

    public function setUnit(int $unit): FiatCurrencyBuilder
    {
        $this->unit = $unit;
        return $this;
    }

    public function setCountryId(?int $countryId): FiatCurrencyBuilder
    {
        $this->countryId = $countryId;
        return $this;
    }

    public function setCountryName(string $countryName): FiatCurrencyBuilder
    {
        $this->countryName = $countryName;
        return $this;
    }
}
