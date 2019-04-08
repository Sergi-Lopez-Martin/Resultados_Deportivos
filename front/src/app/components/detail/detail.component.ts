import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ResultadosDeportivosService } from '../../services/resultados-deportivos.service';

@Component({
  selector: 'app-detail',
  templateUrl: './detail.component.html',
  styleUrls: ['./detail.component.css']
})
export class DetailComponent implements OnInit {

  public equipo: string;
  private info: any[];

  constructor( private resultados: ResultadosDeportivosService, private route: ActivatedRoute ) {
    this.equipo = this.route.snapshot.paramMap.get('equipo');
    this.resultados.detalle(this.equipo).subscribe(value => this.equipoData(value));
   }

  ngOnInit() {
  }

  equipoData(value) {
    this.info = value;
  }
}
