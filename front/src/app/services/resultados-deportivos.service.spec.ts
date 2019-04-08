import { TestBed } from '@angular/core/testing';

import { ResultadosDeportivosService } from './resultados-deportivos.service';

describe('ResultadosDeportivosService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ResultadosDeportivosService = TestBed.get(ResultadosDeportivosService);
    expect(service).toBeTruthy();
  });
});
