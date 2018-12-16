<?php

namespace alexshadie\currency;

class CryptoCurrency
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
     * @var ?string
     */
    private $announcement;

    /**
     * @var null|int
     */
    private $confirmations;

    /**
     * @var null|float
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

    private $isMineable;

    /**
     * CryptoCurrency constructor.
     * @param int $id
     * @param string $code
     * @param string $name
     * @param null|string $logo
     * @param array|string|null $explorer
     * @param array|string|null $site
     * @param array|string|null $chat
     * @param string|null $announcement
     * @param int|null $confirmations
     * @param float|null $supply
     * @param null|string $sourceCode
     * @param null|string $documentation
     * @param string $type
     * @param bool|int $isMineable
     */
    public function __construct(
        int $id, string $code, string $name, ?string $logo, $explorer, $site, $chat, ?string $announcement,
        ?int $confirmations, ?float $supply, ?string $sourceCode, ?string $documentation, string $type, $isMineable
    )
    {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->logo = $logo;
        if (!$explorer) {
            $this->explorer = [];
        } elseif (is_array($explorer)) {
            $this->explorer = $explorer;
        } elseif (json_decode($explorer)) {
            $this->explorer = json_decode($explorer, 1);
        } else {
            $this->explorer = [$explorer];
        }
        if (!$site) {
            $this->site = [];
        } elseif (is_array($site)) {
            $this->site = $site;
        } elseif (json_decode($site)) {
            $this->site = json_decode($site, 1);
        } else {
            $this->site = [$site];
        }
        if (!$chat) {
            $this->chat = [];
        } elseif (is_array($chat)) {
            $this->chat = $chat;
        } elseif (json_decode($chat)) {
            $this->chat = json_decode($chat, 1);
        } else {
            $this->chat = [$chat];
        }
        $this->confirmations = $confirmations;
        $this->supply = $supply;
        $this->sourceCode = $sourceCode;
        $this->documentation = $documentation;
        $this->type = $type;
        $this->isMineable = !!$isMineable;
    }

    public function equals(CryptoCurrency $currency): bool
    {
        return
            $this->getId() == $currency->getId() &&
            $this->getCode() == $currency->getCode() &&
            $this->getName() == $currency->getName() &&
            $this->getLogo() == $currency->getLogo() &&
            $this->getExplorer() == $currency->getExplorer() &&
            $this->getSite() == $currency->getSite() &&
            $this->getChat() == $currency->getChat() &&
            $this->getAnnouncement() == $currency->getAnnouncement() &&
            $this->getConfirmations() == $currency->getConfirmations() &&
            $this->getSupply() == $currency->getSupply() &&
            $this->getSourceCode() == $currency->getSourceCode() &&
            $this->getDocumentation() == $currency->getDocumentation() &&
            $this->getType() == $currency->getType() &&
            $this->getIsMineable() == $currency->getIsMineable();
    }

    public static function build(): CryptoCurrencyBuilder
    {
        return new CryptoCurrencyBuilder();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return null|string
     */
    public function getLogo(): ?string
    {
        return $this->logo;
    }

    /**
     * @return array
     */
    public function getExplorer(): array
    {
        return $this->explorer;
    }

    /**
     * @return array
     */
    public function getSite(): array
    {
        return $this->site;
    }

    /**
     * @return array
     */
    public function getChat(): array
    {
        return $this->chat;
    }

    /**
     * @return string|null
     */
    public function getAnnouncement(): ?string
    {
        return $this->announcement;
    }

    /**
     * @return int|null
     */
    public function getConfirmations(): ?int
    {
        return $this->confirmations;
    }

    /**
     * @return float|null
     */
    public function getSupply(): ?float
    {
        return $this->supply;
    }

    /**
     * @return null|string
     */
    public function getSourceCode(): ?string
    {
        return $this->sourceCode;
    }

    /**
     * @return null|string
     */
    public function getDocumentation(): ?string
    {
        return $this->documentation;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function getIsMineable(): bool
    {
        return $this->isMineable;
    }
}

