<?php

namespace alexshadie\currency;

class FiatCurrencyBuilder
{
    /** @var int */
    private $id;

    /** @var string */
    private $code;

    /** @var string */
    private $name;

    /** @var int */
    private $unit;

    /** @var int|null */
    private $countryId;

    /** @var string */
    private $countryName;

    public static function from(FiatCurrency $src): FiatCurrencyBuilder
    {
        $builder = new FiatCurrencyBuilder();
        $builder->setId($src->getId());
        $builder->setCode($src->getCode());
        $builder->setName($src->getName());
        $builder->setUnit($src->getUnit());
        $builder->setCountryId($src->getCountryId());
        $builder->setCountryName($src->getCountryName());
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