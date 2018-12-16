<?php

namespace alexshadie\currency;

class CryptoCurrencyBuilder
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
     * @var null|string
     */
    private $logo;

    /**
     * @var array
     */
    private $explorer;

    /**
     * @var array
     */
    private $site;

    /**
     * @var array
     */
    private $chat;

    /**
     * @var string|null
     */
    private $announcement;

    /**
     * @var null|int
     */
    private $confirmations;

    /**
     * @var float|null
     */
    private $supply;

    /**
     * @var null|string
     */
    private $sourceCode;

    /**
     * @var null|string
     */
    private $documentation;

    /**
     * @var string
     */
    private $type;

    /**
     * @var bool
     */
    private $isMineable;

    public static function from(CryptoCurrency $src): CryptoCurrencyBuilder
    {
        $builder = new CryptoCurrencyBuilder();
        $builder->setId($src->getId());
        $builder->setCode($src->getCode());
        $builder->setName($src->getName());
        $builder->setLogo($src->getLogo());
        $builder->setExplorer($src->getExplorer());
        $builder->setSite($src->getSite());
        $builder->setChat($src->getChat());
        $builder->setAnnouncement($src->getAnnouncement());
        $builder->setConfirmations($src->getConfirmations());
        $builder->setSupply($src->getSupply());
        $builder->setSourceCode($src->getSourceCode());
        $builder->setDocumentation($src->getDocumentation());
        $builder->setType($src->getType());
        $builder->setIsMineable($src->getIsMineable());
        return $builder;
    }

    public function create(): CryptoCurrency
    {
        return new CryptoCurrency(
            $this->id,
            $this->code,
            $this->name,
            $this->logo,
            $this->explorer,
            $this->site,
            $this->chat,
            $this->announcement,
            $this->confirmations,
            $this->supply,
            $this->sourceCode,
            $this->documentation,
            $this->type,
            $this->isMineable
        );
    }

    /**
     * @param int $id
     * @return CryptoCurrencyBuilder
     */
    public function setId(int $id): CryptoCurrencyBuilder
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $code
     * @return CryptoCurrencyBuilder
     */
    public function setCode(string $code): CryptoCurrencyBuilder
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @param string $name
     * @return CryptoCurrencyBuilder
     */
    public function setName(string $name): CryptoCurrencyBuilder
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param null|string $logo
     * @return CryptoCurrencyBuilder
     */
    public function setLogo(?string $logo): CryptoCurrencyBuilder
    {
        $this->logo = $logo;
        return $this;
    }

    /**
     * @param array|string|null $explorer
     * @return CryptoCurrencyBuilder
     */
    public function setExplorer($explorer): CryptoCurrencyBuilder
    {
        if (!$explorer) {
            $this->explorer = [];
        } elseif (is_array($explorer)) {
            $this->explorer = $explorer;
        } elseif (json_decode($explorer)) {
            $this->explorer = json_decode($explorer, 1);
        } else {
            $this->explorer = [$explorer];
        }
        return $this;
    }

    /**
     * @param null|array|string $site
     * @return CryptoCurrencyBuilder
     */
    public function setSite($site): CryptoCurrencyBuilder
    {
        if (!$site) {
            $this->site = [];
        } elseif (is_array($site)) {
            $this->site = $site;
        } elseif (json_decode($site)) {
            $this->site = json_decode($site, 1);
        } else {
            $this->site = [$site];
        }
        return $this;
    }

    /**
     * @param null|array|string $chat
     * @return CryptoCurrencyBuilder
     */
    public function setChat($chat): CryptoCurrencyBuilder
    {
        if (!$chat) {
            $this->chat = [];
        } elseif (is_array($chat)) {
            $this->chat = $chat;
        } elseif (json_decode($chat)) {
            $this->chat = json_decode($chat, 1);
        } else {
            $this->chat = [$chat];
        }
        return $this;
    }

    /**
     * @param null|string $announcement
     * @return CryptoCurrencyBuilder
     */
    public function setAnnouncement(?string $announcement): CryptoCurrencyBuilder
    {
        $this->announcement = $announcement;
        return $this;
    }

    /**
     * @param int|null $confirmations
     * @return CryptoCurrencyBuilder
     */
    public function setConfirmations(?int $confirmations): CryptoCurrencyBuilder
    {
        $this->confirmations = $confirmations;
        return $this;
    }

    /**
     * @param float|null $supply
     * @return CryptoCurrencyBuilder
     */
    public function setSupply(?float $supply): CryptoCurrencyBuilder
    {
        $this->supply = $supply;
        return $this;
    }

    /**
     * @param null|string $sourceCode
     * @return CryptoCurrencyBuilder
     */
    public function setSourceCode(?string $sourceCode): CryptoCurrencyBuilder
    {
        $this->sourceCode = $sourceCode;
        return $this;
    }

    /**
     * @param null|string $documentation
     * @return CryptoCurrencyBuilder
     */
    public function setDocumentation(?string $documentation): CryptoCurrencyBuilder
    {
        $this->documentation = $documentation;
        return $this;
    }

    /**
     * @param string $type
     * @return CryptoCurrencyBuilder
     */
    public function setType(string $type): CryptoCurrencyBuilder
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param bool|int $isMineable
     * @return CryptoCurrencyBuilder
     */
    public function setIsMineable($isMineable): CryptoCurrencyBuilder
    {
        $this->isMineable = !!$isMineable;
        return $this;
    }


}

