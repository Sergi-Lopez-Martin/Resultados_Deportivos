import { Component, OnInit } from '@angular/core';
import {Router} from '@angular/router';
import { ResultadosDeportivosService } from '../../services/resultados-deportivos.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  constructor( private resultadosDeportivos: ResultadosDeportivosService, private router: Router ) { }

  ngOnInit() {
  }

  resultados: any[];
  equipos: any[];

  goto(word){
    this.router.navigateByUrl('/list/' + word);
  }

}
