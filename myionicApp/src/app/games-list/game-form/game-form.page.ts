import { Component, OnInit } from '@angular/core';
import { Game } from 'src/app/models/Game.model';
import { ActivatedRoute, Router } from '@angular/router';
import { GamesService } from 'src/app/services/games.service';
import { ConsolesService } from 'src/app/services/consoles.service';
import { NgForm } from '@angular/forms';
import { MenuController } from '@ionic/angular';

@Component({
  selector: 'app-game-form',
  templateUrl: './game-form.page.html',
  styleUrls: ['./game-form.page.scss'],
})
export class GameFormPage implements OnInit {

  consoles: Console;
  game: Game
  add: any;
  id = this.route.snapshot.params['id'];

  constructor(private router: Router,
              private route: ActivatedRoute,
              private ConsolesService: ConsolesService,
              private GamesServices: GamesService,
              private menuCtrl: MenuController) {

      //load all consoles
      this.ConsolesService.getServicesConsoles().subscribe(
        data => {
          this.consoles = data;
      });

      if(this.id != undefined){
        this.game = new Game('', '', '', '','', 0);
        this.GamesServices.getServicesSingleGame(+this.id).subscribe(
          data => {
            this.game = data;
          }
        );
        this.add = false;
      }else{ //edit
        this.add = true; }
  }

  ngOnInit() {
  }

  onSubmit(form: NgForm){

    if(this.add == true){// add game

      if(form.value['console_id'] == undefined || form.value['console_id'] == null){ // if there is no console in db
        this.router.navigate(['consoles-list']);
      }

      let jeu: any;
      jeu = {
        nom: form.value['nom'],
        genre: form.value['genre'],
        console_id: form.value['console_id'],
        image: form.value['image'],
        date_de_sortie: form.value['date_de_sortie'],
        commentaire: form.value['commentaire']
      };


      this.GamesServices.addServicePost(jeu).subscribe(( result => {
        this.router.navigate(['/games-list']);
      }));
    }else{ //edit game
      let jeu: any;
      jeu = {
        nom: form.value['nom'],
        genre: form.value['genre'],
        console_id: form.value['console_id'],
        image: form.value['image'],
        date_de_sortie: form.value['date_de_sortie'],
        commentaire: form.value['commentaire']
      };

      this.GamesServices.editServicePut(jeu, this.id).subscribe(( result => {
        this.router.navigate(['games-list']);
      }));
    }
  }

  onToggleMenu()
  {
    this.menuCtrl.enable(true, 'menu');
    this.menuCtrl.open('menu');
  }

  onAddGame(){
    this.router.navigate(['game-form']);
  }

}
