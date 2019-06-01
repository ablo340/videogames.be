import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ConsolesService } from 'src/app/services/consoles.service';
import { MenuController, ToastController, NavController } from '@ionic/angular';
import { NgForm } from '@angular/forms';
import { Console } from 'src/app/models/Console.model';

@Component({
  selector: 'app-console-form',
  templateUrl: './console-form.page.html',
  styleUrls: ['./console-form.page.scss'],
})
export class ConsoleFormPage implements OnInit {

  console: Console;
  id = this.route.snapshot.params['id'];
  add: any;

  constructor(private router: Router,
    private route: ActivatedRoute,
    private ConsolesService: ConsolesService,
    private menuCtrl: MenuController,
    public toastController: ToastController,
    private navCtrl: NavController) {

      if(this.id != undefined){
        this.console = new Console('', '', 0, '','', '');
        this.ConsolesService.getServicesSingleConsoles(+this.id).subscribe(
          data => {
            this.console = data;
          }
        );
    
        this.add = false; //edit
      }else{
        this.add = true; }
    }

  ngOnInit() {
  }

  onSubmit(form: NgForm){

    if(this.add == true){// add
      let conso: any;
      conso = {
        nom: form.value['nom'],
        fabricant: form.value['fabricant'],
        prix: form.value['prix'],
        image: form.value['image'],
        date_de_sortie: form.value['date_de_sortie'],
        description: form.value['description']
      };

      this.ConsolesService.addServicePost(conso).subscribe(( result => {
        this.router.navigate(['console-list']);
        this.AddToast(); //message toast
      }));
    }else{ //edit
      let conso: any;
      conso = {
        nom: form.value['nom'],
        fabricant: form.value['fabricant'],
        prix: form.value['prix'],
        image: form.value['image'],
        date_de_sortie: form.value['date_de_sortie'],
        description: form.value['description']
      };

      this.ConsolesService.editServicePut(conso, this.id).subscribe(( result => {
        this.router.navigate(['consoles-list']);
        this.EditToast(); //message toast
      }));
    }
  }

  async AddToast() {
    const toast = await this.toastController.create({
      message: 'Console ajouter avec Succès.',
      duration: 2000,
      color: "success"
    });
    toast.present();
  }

  async EditToast() {
    const toast = await this.toastController.create({
      message: 'Console modifier avec Succès.',
      duration: 2000,
      color: "success"
    });
    toast.present();
  }

  backToConsoleList()
  {
    this.navCtrl.navigateBack('consoles-list');
  }

}
