<?php
namespace Nicki\DoctrineDbal\Entity;

class Round
{
    public string $tournamentName;
    public string $tournamentDate;
    public int $roundNumber;
    public string $playerName;
    public string $playerSymbol;
    public string $playedAt;

    public function __construct(
        string $name,
        string $date,
        int $round,
        string $player,
        string $symbol,
        string $time
    ) {
        $this->tournamentName = $name;
        $this->tournamentDate = $date;
        $this->roundNumber = $round;
        $this->playerName = $player;
        $this->playerSymbol = $symbol;
        $this->playedAt = $time;
    }
}