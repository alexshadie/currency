<?php


namespace alexshadie\currency;


use alexshadie\dbwrapper\DBInterface;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    /** @var DBInterface */
    private $db;

    public function __construct(DBInterface $db)
    {
        $this->db = $db;
    }
}