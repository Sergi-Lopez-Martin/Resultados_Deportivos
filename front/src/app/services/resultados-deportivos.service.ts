import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ResultadosDeportivosService {

  constructor(private http:HttpClient) { }

  resultados(value){
    return this.http.get("http://localhost:8080/api/resultados/" + value);
  }

  temporadas(){
    return this.http.get("http://localhost:8080/api/temporadas");
  }

  equipos(value){
    return this.http.get("http://localhost:8080/api/equipos/" + value);
  }

  detalle(value){
    return this.http.get("http://localhost:8080/api/detail/" + value);
  }
}
