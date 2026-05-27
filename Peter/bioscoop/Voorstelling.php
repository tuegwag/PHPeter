<?php
class Voorstelling
{
    public readonly Film $film;
    public readonly Zaal $zaal;
    public readonly string $datum;
    public readonly string $tijd;
    public readonly float $prijs;

    private int $verkochteTickets = 0;
    private array $tickets = [];

    public function __construct(Film $film, Zaal $zaal, string $datum, string $tijd, float $prijs)
    {
        $this->film = $film;
        $this->zaal = $zaal;
        $this->datum = $datum;
        $this->tijd = $tijd;
        $this->prijs = $prijs;
    }

    public function verkoopTicket(string $naam): Ticket
    {
        $this->verkochteTickets++;
        $ticket = new Ticket($this->verkochteTickets, $this, $naam);
        $this->tickets[] = $ticket;
        return $ticket;
    }

    public function getResterendePlaatsen(): int
    {
        return $this->zaal->aantalStoelen - $this->verkochteTickets;
    }

    public function isVol(): bool
    {
        return $this->getResterendePlaatsen() <= 0;
    }

    public function getInkomsten(): float
    {
        return $this->verkochteTickets * $this->prijs;
    }
}
?>
