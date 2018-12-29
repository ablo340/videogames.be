import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Game } from '../models/Game.model';

@Injectable({
  providedIn: 'root'
})
export class GamesService {

  private baseUrl = 'http://localhost:8000/api/'
  
  constructor(private http: HttpClient) { }

  //get all games
  getServicesGames(): Observable<any> {
    return this.http.get(this.baseUrl +'home' );
  }

  //get one game
  getServicesSingleGame(id: number): Observable<Game>{
    return this.http.get(this.baseUrl + 'game/' + id );
  }

  // Put new game in database
  addServicePost(game: any){
    return this.http.post(this.baseUrl + 'add/game', game);
  }

  // Edit a game in database
  editServicePut(conso: any, id: number){
    return this.http.put(this.baseUrl + 'add/game/' + id + '/edit', conso );
  }

  //delete a game in database
  deleteService(id: number){
    return this.http.delete(this.baseUrl + 'delete/game/' + id);
  }
}
