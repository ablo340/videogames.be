// app.module.ts
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { GamesListComponent } from './games-list/games-list.component';
import { SingleGameComponent } from './games-list/single-game/single-game.component';
import { GameFormComponent } from './games-list/game-form/game-form.component';
import { GamesService } from './services/games.service';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { Routes, RouterModule } from '@angular/router';
import { ConsolesListComponent } from './consoles-list/consoles-list.component';
import { ConsoleFormComponent } from './consoles-list/console-form/console-form.component';
import { SingleConsoleComponent } from './consoles-list/single-console/single-console.component';
import { FourOnehundredFourComponent } from './four-onehundred-four/four-onehundred-four.component';
import { ConsolesService } from './services/consoles.service';
import { DeleteComponent } from './delete/delete.component';
import { GameFilterPipe } from './games-list/game-filter.pipe';
import { ConsoleFilterPipe } from './consoles-list/console-filter.pipe';

const appRoutes: Routes = [
  {path: 'games', component: GamesListComponent},
  {path: 'games/news', component: GameFormComponent},
  {path: 'game/edit/:id', component: GameFormComponent},
  {path: 'game/view/:id', component: SingleGameComponent},
  {path: 'consoles', component: ConsolesListComponent},
  {path: 'consoles/news', component: ConsoleFormComponent},
  {path: 'consoles/edit/:id', component: ConsoleFormComponent},
  {path: 'console/view/:id', component: SingleConsoleComponent},
  {path: '', component: GamesListComponent},
  {path: 'not-found', component: FourOnehundredFourComponent},
  {path: '**', redirectTo: '/not-found'}
];

@NgModule({
  declarations: [
    AppComponent,
    GamesListComponent,
    SingleGameComponent,
    GameFormComponent,
    ConsolesListComponent,
    ConsoleFormComponent,
    SingleConsoleComponent,
    FourOnehundredFourComponent,
    DeleteComponent,
    GameFilterPipe,
    ConsoleFilterPipe
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    RouterModule.forRoot(appRoutes)
  ],
  providers: [
    GamesService, ConsolesService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
