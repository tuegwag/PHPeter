<?php
class Film
{
    public readonly string $titel;
    public readonly string $regisseur;
    public readonly int $duurInMinuten;
    public readonly int $leeftijdsgrens;

    public function __construct(string $titel, string $regisseur, int $duurInMinuten, int $leeftijdsgrens)
    {
        $this->titel = $titel;
        $this->regisseur = $regisseur;
        $this->duurInMinuten = $duurInMinuten;
        $this->leeftijdsgrens = $leeftijdsgrens;
    }

    public function getDuurAlsString(): string
    {
        $uur = intdiv($this->duurInMinuten, 60);
        $minuten = $this->duurInMinuten % 60;
        return "{$uur} uur en {$minuten} minuten";
    }

    public function isGeschiktVoor(int $leeftijd): bool
    {
        return $leeftijd >= $this->leeftijdsgrens;
    }

    public function getSamenvatting(): string
    {
        return "{$this->titel} (regisseur: {$this->regisseur}) | {$this->duurInMinuten} min | Leeftijd: {$this->leeftijdsgrens}+";
    }
}

?>