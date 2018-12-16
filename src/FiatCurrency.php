<?php

namespace alexshadie\currency;

class FiatCurrency
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

    public function __construct(int $id, string $code, string $name, int $unit, ?int $countryId, string $countryName)
    {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->unit = $unit;
        $this->countryId = $countryId;
        $this->countryName = $countryName;
    }

    public function equals(FiatCurrency $currency): bool
    {
        return
            $this->getId() == $currency->getId() &&
            $this->getCode() == $currency->getCode() &&
            $this->getName() == $currency->getName() &&
            $this->getUnit() == $currency->getUnit() &&
            $this->getCountryId() === $currency->getCountryId() &&
            $this->getCountryName() == $currency->getCountryName();
    }

    public static function build(): FiatCurrencyBuilder
    {
        return new FiatCurrencyBuilder();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUnit(): int
    {
        return $this->unit;
    }

    public function getCountryId(): ?int
    {
        return $this->countryId;
    }

    public function getCountryName(): string
    {
        return $this->countryName;
    }

}

