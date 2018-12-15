<?php

namespace alexshadie\currency;

class CurrencyBuilder
{
    /** @var int */
    private $id;

    /** @var string */
    private $code;

    /** @var string */
    private $type;

    /** @var string */
    private $name;

    /** @var int */
    private $unit;

    /** @var int|null */
    private $countryId;

    /** @var string */
    private $countryName;

    public static function from(Currency $src): CurrencyBuilder
    {
        $builder = new CurrencyBuilder();
        $builder->setId($src->getId());
        $builder->setCode($src->getCode());
        $builder->setType($src->getType());
        $builder->setName($src->getName());
        $builder->setUnit($src->getUnit());
        $builder->setCountryId($src->getCountryId());
        $builder->setCountryName($src->getCountryName());
        return $builder;
    }

    public function create(): Currency
    {
        return new Currency(
            $this->id,
            $this->code,
            $this->type,
            $this->name,
            $this->unit,
            $this->countryId,
            $this->countryName
        );
    }
    public function setId(int $id): CurrencyBuilder
    {
        $this->id = $id;
        return $this;
    }

    public function setCode(string $code): CurrencyBuilder
    {
        $this->code = $code;
        return $this;
    }

    public function setType(string $type): CurrencyBuilder
    {
        $this->type = $type;
        return $this;
    }

    public function setName(string $name): CurrencyBuilder
    {
        $this->name = $name;
        return $this;
    }

    public function setUnit(int $unit): CurrencyBuilder
    {
        $this->unit = $unit;
        return $this;
    }

    public function setCountryId(?int $countryId): CurrencyBuilder
    {
        $this->countryId = $countryId;
        return $this;
    }

    public function setCountryName(string $countryName): CurrencyBuilder
    {
        $this->countryName = $countryName;
        return $this;
    }

}