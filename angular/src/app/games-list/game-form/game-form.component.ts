import { Component, OnInit } from '@angular/core';
import { Game } from 'src/app/models/Game.model';
import { Console } from 'src/app/models/Console.model';
import { Router, ActivatedRoute } from '@angular/router';
import { ConsolesService } from 'src/app/services/consoles.service';
import { GamesService } from 'src/app/services/games.service';
import { NgForm } from '@angular/forms';

@Component({
  selector: 'app-game-form',
  templateUrl: './game-form.component.html',
  styleUrls: ['./game-form.component.scss']
})
export class GameFormComponent implements OnInit {

  consoles: Console;
  game: Game
  id = this.route.snapshot.params['id'];
  add: any;
  
  constructor(private router: Router,
              private route: ActivatedRoute,
              private ConsolesService: ConsolesService,
              private GamesServices: GamesService) {

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
        this.router.navigate(['/games']);
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
        this.router.navigate(['/games']);
      }));
    }
  }

}
