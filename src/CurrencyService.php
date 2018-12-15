<?php


namespace alexshadie\currency;


class CurrencyService implements CurrencyServiceInterface
{
    /** @var CurrencyRepositoryInterface */
    private $currencyRepository;

    private function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }
}