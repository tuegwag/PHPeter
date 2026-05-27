<?php
class Ticket
{
    public readonly int $nummer;
    public readonly Voorstelling $voorstelling;
    public readonly string $naam;

    public function __construct(int $nummer, Voorstelling $voorstelling, string $naam)
    {
        $this->nummer = $nummer;
        $this->voorstelling = $voorstelling;
        $this->naam = $naam;
    }

    public function getBevestiging(): string
    {
        $film = $this->voorstelling->film;
        $zaal = $this->voorstelling->zaal;
        $prijs = number_format($this->voorstelling->prijs, 2, '.', '');
        return "Ticket #{$this->nummer} | {$film->titel} | {$zaal->getZaalnaam()} | {$this->voorstelling->datum} {$this->voorstelling->tijd} | EUR {$prijs} | Op naam van {$this->naam}";
    }
}
?>
