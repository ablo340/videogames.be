// games-list.component.ts

import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { GamesService } from '../services/games.service';
import { Game } from '../models/Game.model';
import { Router } from '@angular/router';

@Component({
  selector: 'app-games-list',
  templateUrl: './games-list.component.html',
  styleUrls: ['./games-list.component.scss']
})
export class GamesListComponent implements OnInit {

  games: Observable<Game[]>;
  searchName: String;

  constructor(private GamesService: GamesService,
              private router: Router) { }
  
  ngOnInit(): void { 
    this.getGames();
  }
  
  getGames() { // get all games from database
    this.GamesService.getServicesGames().subscribe(
      data => {
        this.games = data;
      }
    );
  }

  onViewGame(id: any){ // show on game
    this.router.navigate(['game', 'view', +id]);
  }

  onDeleteGame(id: any){ // delete game
    this.GamesService.deleteService(+id).subscribe(( result => {
      this.router.navigate(['/consoles']);
    }));
  }
}
