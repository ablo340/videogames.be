import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { ConsolesService } from '../services/consoles.service';
import { Console } from '../models/Console.model';
import { Router } from '@angular/router';

@Component({
  selector: 'app-consoles-list',
  templateUrl: './consoles-list.component.html',
  styleUrls: ['./consoles-list.component.scss']
})
export class ConsolesListComponent implements OnInit {

  consoles: Observable<Console[]>;

  constructor(private ConsolesService: ConsolesService,
              private router: Router) { }

  ngOnInit(): void { 
    this.getConsoles();
  }

  getConsoles() { // get all consoles from database 
    this.ConsolesService.getServicesConsoles().subscribe(
      data => {
        this.consoles = data;
      }
    );
  }

  onViewConsole(id: any){ // show One console
    this.router.navigate(['console', 'view', +id]);
  }

  onDeleteConsole(id: any){ // delete console
    this.ConsolesService.deleteService(+id).subscribe(( result => {
      this.router.navigate(['/games']);
    }));
  }

}
