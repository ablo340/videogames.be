import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  { path: '', redirectTo: 'games-list', pathMatch: 'full' },
  { path: 'games-list', loadChildren: './games-list/games-list.module#GamesListPageModule' },
  { path: 'consoles-list', loadChildren: './consoles-list/consoles-list.module#ConsolesListPageModule' },
  { path: 'console-form', loadChildren: './consoles-list/console-form/console-form.module#ConsoleFormPageModule' },
  { path: 'game-form', loadChildren: './games-list/game-form/game-form.module#GameFormPageModule' },
  { path: 'game-form-edit', loadChildren: './games-list/game-form/game-form.module#GameFormPageModule' },
  { path: 'console-form-edit', loadChildren: './consoles-list/console-form/console-form.module#ConsoleFormPageModule' }
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
