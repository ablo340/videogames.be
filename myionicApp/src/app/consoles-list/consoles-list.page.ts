import { Component, OnInit } from '@angular/core';
import { Console } from 'src/app/models/Console.model';
import { Observable } from 'rxjs';
import { NavController, MenuController } from '@ionic/angular';
import { ConsolesService } from 'src/app/services/consoles.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-consoles-list',
  templateUrl: './consoles-list.page.html',
  styleUrls: ['./consoles-list.page.scss'],
})
export class ConsolesListPage implements OnInit {

  consoles: Observable<Console[]>;

  constructor(
    private menuCtrl: MenuController,
    private router: Router,
    private ConsolesService: ConsolesService) { }

  ngOnInit(){ 
  }

  ionViewWillEnter() {
    this.getConsoles();
  }

  onToggleMenu()
  {
    this.menuCtrl.enable(true, 'menu');
    this.menuCtrl.open('menu');
  }

  getConsoles() { // get all consoles from database
    this.ConsolesService.getServicesConsoles().subscribe(
      data => {
        this.consoles = data;
      }
    );
  }

  onAddConsole(){
    this.router.navigate(['console-form']);
  }

  onEditConsole(id: any){ // edit console
    this.router.navigate(['console-form-edit', {id}]);
  }
  onDeleteConsole(id: any){ // delete console
    this.ConsolesService.deleteService(+id).subscribe(( result => {
      this.ionViewWillEnter();
    }));
  }

}
