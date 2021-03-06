<?php
/*
 * This file was generated by modelGen
 * VERSION: 8fcd516e165de2905616708ad5fccec8
 * https://github.com/alexshadie/modelGen
 */

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

    public function __construct(int $id, string $code, string $name, ?string $logo,  $explorer,  $site,  $chat, ?string $announcement, ?int $confirmations, ?float $supply, ?string $sourceCode, ?string $documentation, string $type, bool $isMineable)
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
            $this->explorer = json_decode($explorer, true);
        } else {
            $this->explorer = [$explorer];
        }
        if (!$site) {
            $this->site = [];
        } elseif (is_array($site)) {
            $this->site = $site;
        } elseif (json_decode($site)) {
            $this->site = json_decode($site, true);
        } else {
            $this->site = [$site];
        }
        if (!$chat) {
            $this->chat = [];
        } elseif (is_array($chat)) {
            $this->chat = $chat;
        } elseif (json_decode($chat)) {
            $this->chat = json_decode($chat, true);
        } else {
            $this->chat = [$chat];
        }
        $this->announcement = $announcement;
        $this->confirmations = $confirmations;
        $this->supply = $supply;
        $this->sourceCode = $sourceCode;
        $this->documentation = $documentation;
        $this->type = $type;
        $this->isMineable = $isMineable;
    }

    public static function build(): CryptoCurrencyBuilder
    {
        return new CryptoCurrencyBuilder();
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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function getExplorer(): array
    {
        return $this->explorer;
    }

    public function getExplorerJson(): string
    {
        return json_encode($this->explorer);
    }

    public function getSite(): array
    {
        return $this->site;
    }

    public function getSiteJson(): string
    {
        return json_encode($this->site);
    }

    public function getChat(): array
    {
        return $this->chat;
    }

    public function getChatJson(): string
    {
        return json_encode($this->chat);
    }

    public function getAnnouncement(): ?string
    {
        return $this->announcement;
    }

    public function getConfirmations(): ?int
    {
        return $this->confirmations;
    }

    public function getSupply(): ?float
    {
        return $this->supply;
    }

    public function getSourceCode(): ?string
    {
        return $this->sourceCode;
    }

    public function getDocumentation(): ?string
    {
        return $this->documentation;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getIsMineable(): bool
    {
        return $this->isMineable;
    }

    public function equals(?CryptoCurrency $src): bool
    {
        if (is_null($src)) {
            return false;
        }
        return
            $this->getId() === $src->getId() &&
            $this->getCode() === $src->getCode() &&
            $this->getName() === $src->getName() &&
            $this->getLogo() === $src->getLogo() &&
            $this->getExplorer() === $src->getExplorer() &&
            $this->getSite() === $src->getSite() &&
            $this->getChat() === $src->getChat() &&
            $this->getAnnouncement() === $src->getAnnouncement() &&
            $this->getConfirmations() === $src->getConfirmations() &&
            $this->getSupply() === $src->getSupply() &&
            $this->getSourceCode() === $src->getSourceCode() &&
            $this->getDocumentation() === $src->getDocumentation() &&
            $this->getType() === $src->getType() &&
            $this->getIsMineable() === $src->getIsMineable() 
        ;
    }
}
