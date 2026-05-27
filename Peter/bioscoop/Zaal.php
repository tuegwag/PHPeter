<?php
class Zaal
{
    public readonly int $nummer;
    public readonly int $aantalStoelen;
    public readonly bool $isIMAX;

    public function __construct(int $nummer, int $aantalStoelen, bool $isIMAX)
    {
        $this->nummer = $nummer;
        $this->aantalStoelen = $aantalStoelen;
        $this->isIMAX = $isIMAX;
    }

    public function getZaalnaam(): string
    {
        return "Zaal " . $this->nummer;
    }
}
?>