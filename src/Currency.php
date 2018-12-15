<?php

namespace alexshadie\currency;

class Currency
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
    private $type;

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

    public function __construct(int $id, string $code, string $type, string $name, int $unit, ?int $countryId, string $countryName) {
        $this->id = $id;
        $this->code = $code;
        $this->type = $type;
        $this->name = $name;
        $this->unit = $unit;
        $this->countryId = $countryId;
        $this->countryName = $countryName;
    }

    public function equals(Currency $currency): bool
    {
        return
            $this->getId() == $currency->getId() &&
            $this->getCode() == $currency->getCode() &&
            $this->getType() == $currency->getType() &&
            $this->getName() == $currency->getName() &&
            $this->getUnit() == $currency->getUnit() &&
            $this->getCountryId() === $currency->getCountryId() &&
            $this->getCountryName() == $currency->getCountryName();
    }

    public static function build(): CurrencyBuilder
    {
        return new CurrencyBuilder();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getType(): string
    {
        return $this->type;
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

