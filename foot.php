<?php

class FootballTeam {
    private string $name;
    private array $players = [];
    private string $coachName;

    
    public function __construct(string $name, string $coachName) {
        $this->name = $name;
        $this->coachName = $coachName;
    }
    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

  
    public function addPlayer(string $playerName): void {
        $this->players[] = $playerName;
    }

    
    public function getPlayers(): array {
        return $this->players;
    }

    
    public function getCoachName(): string {
        return $this->coachName;
    }

      public function setCoachName(string $coachName): void {
        $this->coachName = $coachName;
    }
}


