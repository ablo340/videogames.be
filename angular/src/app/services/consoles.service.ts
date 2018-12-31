// console.service.ts
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ConsolesService {

  private baseUrl = 'http://localhost:8000/api/'
  
  constructor(private http: HttpClient) { }

  //get all consoles
  getServicesConsoles(): Observable<any> {
    return this.http.get(this.baseUrl +'consoles' );
  }

  //get one console
  getServicesSingleConsoles(id: number): Observable<any>{
    return this.http.get(this.baseUrl + 'console/' + id );
  }

  // Put new console in database
  addServicePost(conso: any){
    return this.http.post(this.baseUrl + 'add/console', conso);
  }

  // Edit a console in database
  editServicePut(conso: any, id: number){
    return this.http.put(this.baseUrl + 'add/console/' + id + '/edit', conso );
  }

  // delete a console in database
  deleteService(id: number){
    return this.http.delete(this.baseUrl + 'delete/console/' + id);
  }
}
