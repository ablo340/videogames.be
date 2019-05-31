import { Component, OnInit } from '@angular/core';
import { NavController, MenuController } from '@ionic/angular';
import { Observable } from 'rxjs';
import { Game } from '../models/Game.model';
import { GamesService } from '../services/games.service';
import { Router, ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-games-list',
  templateUrl: './games-list.page.html',
  styleUrls: ['./games-list.page.scss'],
})
export class GamesListPage implements OnInit {

  games: Observable<Game[]>;

  constructor(
    private router: Router,
    private menuCtrl: MenuController,
    private GamesService: GamesService,) { }

  ngOnInit(){
  }

  ionViewWillEnter() {
    this.getGames();
  }

  onToggleMenu()
  {
    this.menuCtrl.enable(true, 'menu');
    this.menuCtrl.open('menu');
  }

  onAddGame(){
    this.router.navigate(['game-form']);
  }

  getGames() { // get all games from database
    this.GamesService.getServicesGames().subscribe(
      data => {
        this.games = data;
      }
    );
  }

  onEditGame(id: any){ // edit game
    this.router.navigate(['game-form-edit', {id}]);
  }
  onDeleteGame(id: any){ // delete game
    this.GamesService.deleteService(+id).subscribe(( result => {
      this.ionViewWillEnter();
    }));
  }

}
