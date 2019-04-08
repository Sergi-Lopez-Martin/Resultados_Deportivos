import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ResultadosDeportivosService } from '../../services/resultados-deportivos.service';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.css']
})
export class ListComponent implements OnInit {
  
  public word: string;
  public partidos: any[];
  public temporadas: any[];
  public equipos: any[];

  constructor( private resultados: ResultadosDeportivosService, private route: ActivatedRoute) {
    this.word = this.route.snapshot.paramMap.get('word');
    this.resultados.resultados(this.word).subscribe(value => this.partidosData(value));
    this.resultados.temporadas().subscribe(value => this.temporadasData(value));
    this.resultados.equipos(this.word).subscribe(value => this.equiposData(value));
  }
  
  ngOnInit() {
  }
  
  partidosData(value) {
    this.partidos = value;
  }

  equiposData(value) {
    this.equipos = value;
  }

  temporadasData(value) {
    this.temporadas = value;
  }

}
