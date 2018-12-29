import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ConsolesService } from 'src/app/services/consoles.service';
import { Console } from 'src/app/models/Console.model';

@Component({
  selector: 'app-single-console',
  templateUrl: './single-console.component.html',
  styleUrls: ['./single-console.component.scss']
})
export class SingleConsoleComponent implements OnInit {

  console: Console;

  constructor(private route: ActivatedRoute,
              private router: Router,
              private ConsolesService: ConsolesService
              ) { }

  ngOnInit() {
    this.getSingleConsole();
  }

  getSingleConsole() { //show on console
    
    this.console = new Console('', '', 0, '','', ''); // create new console
    
    const id = this.route.snapshot.params['id']; //Url's id
    this.ConsolesService.getServicesSingleConsoles(+id).subscribe(
      data => {
        this.console = data;
      }
    );
  }

  onEditConsole(id: any){ // edit console
    this.router.navigate(['/consoles', 'edit', id]);
  }
  onDeleteConsole(id: any){ // delete console
    this.ConsolesService.deleteService(+id).subscribe(( result => {
      this.router.navigate(['/consoles']);
    }));
  }
}
