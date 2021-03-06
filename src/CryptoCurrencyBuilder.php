<?php
/*
 * This file was generated by modelGen
 * VERSION: 8fcd516e165de2905616708ad5fccec8
 * https://github.com/alexshadie/modelGen
 */

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
     * @var string|null
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
     * @var int|null
     */
    private $confirmations;

    /** 
     * @var float|null
     */
    private $supply;

    /** 
     * @var string|null
     */
    private $sourceCode;

    /** 
     * @var string|null
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

    public static function fromArray(array $src): CryptoCurrencyBuilder
    {
        $builder = new CryptoCurrencyBuilder();
        $builder->setId($src["id"] ?? $src[0] ?? 0);
        $builder->setCode($src["code"] ?? $src[1] ?? "");
        $builder->setName($src["name"] ?? $src[2] ?? "");
        $builder->setLogo($src["logo"] ?? $src[3] ?? null);
        $builder->setExplorer($src["explorer"] ?? $src[4] ?? "[]");
        $builder->setSite($src["site"] ?? $src[5] ?? "[]");
        $builder->setChat($src["chat"] ?? $src[6] ?? "[]");
        $builder->setAnnouncement($src["announcement"] ?? $src[7] ?? null);
        $builder->setConfirmations($src["confirmations"] ?? $src[8] ?? null);
        $builder->setSupply($src["supply"] ?? $src[9] ?? null);
        $builder->setSourceCode($src["source_code"] ?? $src["sourceCode"] ?? $src[10] ?? null);
        $builder->setDocumentation($src["documentation"] ?? $src[11] ?? null);
        $builder->setType($src["type"] ?? $src[12] ?? "");
        $builder->setIsMineable($src["is_mineable"] ?? $src["isMineable"] ?? $src[13] ?? false);
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
    public function setId(int $id): CryptoCurrencyBuilder
    {
        $this->id = $id;
        return $this;
    }

    public function setCode(string $code): CryptoCurrencyBuilder
    {
        $this->code = $code;
        return $this;
    }

    public function setName(string $name): CryptoCurrencyBuilder
    {
        $this->name = $name;
        return $this;
    }

    public function setLogo(?string $logo): CryptoCurrencyBuilder
    {
        $this->logo = $logo;
        return $this;
    }

    public function setExplorer($explorer): CryptoCurrencyBuilder
    {
        if (!$explorer) {
            $this->explorer = [];
        } elseif (is_array($explorer)) {
            $this->explorer = $explorer;
        } elseif (json_decode($explorer)) {
            $this->explorer = json_decode($explorer, true);
        } else {
            $this->explorer = [$explorer];
        }
        return $this;
    }

    public function setSite($site): CryptoCurrencyBuilder
    {
        if (!$site) {
            $this->site = [];
        } elseif (is_array($site)) {
            $this->site = $site;
        } elseif (json_decode($site)) {
            $this->site = json_decode($site, true);
        } else {
            $this->site = [$site];
        }
        return $this;
    }

    public function setChat($chat): CryptoCurrencyBuilder
    {
        if (!$chat) {
            $this->chat = [];
        } elseif (is_array($chat)) {
            $this->chat = $chat;
        } elseif (json_decode($chat)) {
            $this->chat = json_decode($chat, true);
        } else {
            $this->chat = [$chat];
        }
        return $this;
    }

    public function setAnnouncement(?string $announcement): CryptoCurrencyBuilder
    {
        $this->announcement = $announcement;
        return $this;
    }

    public function setConfirmations(?int $confirmations): CryptoCurrencyBuilder
    {
        $this->confirmations = $confirmations;
        return $this;
    }

    public function setSupply(?float $supply): CryptoCurrencyBuilder
    {
        $this->supply = $supply;
        return $this;
    }

    public function setSourceCode(?string $sourceCode): CryptoCurrencyBuilder
    {
        $this->sourceCode = $sourceCode;
        return $this;
    }

    public function setDocumentation(?string $documentation): CryptoCurrencyBuilder
    {
        $this->documentation = $documentation;
        return $this;
    }

    public function setType(string $type): CryptoCurrencyBuilder
    {
        $this->type = $type;
        return $this;
    }

    public function setIsMineable(bool $isMineable): CryptoCurrencyBuilder
    {
        $this->isMineable = $isMineable;
        return $this;
    }
}
