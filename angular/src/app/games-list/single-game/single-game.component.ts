// single-game.component.ts

import { Component, OnInit } from '@angular/core';
import { GamesService } from 'src/app/services/games.service';
import { Game } from 'src/app/models/Game.model';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-single-game',
  templateUrl: './single-game.component.html',
  styleUrls: ['./single-game.component.scss']
})
export class SingleGameComponent implements OnInit {

  game: Game;

  constructor(private route: ActivatedRoute,
              private GamesService: GamesService,
              private router: Router
              ) { }

  ngOnInit() {
    this.getSingleGame();
  }

  getSingleGame() { // show one game

    this.game = new Game('', '', '', '','', 0); // create new game
    
    const id = this.route.snapshot.params['id']; //Url's id
    this.GamesService.getServicesSingleGame(+id).subscribe(
      data => {
        this.game = data;
      }
    );
    
  }

  onEditGame(id: any){ // edit game
    this.router.navigate(['/game', 'edit', id]);
  }
  onDeleteGame(id: any){ // delete game
    this.GamesService.deleteService(+id).subscribe(( result => {
      this.router.navigate(['/games']);
    }));
  }
}
