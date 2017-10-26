import { TestBed, inject } from '@angular/core/testing';

import { ArchivoJugadoresService } from './archivo-jugadores.service';

describe('ArchivoJugadoresService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ArchivoJugadoresService]
    });
  });

  it('should be created', inject([ArchivoJugadoresService], (service: ArchivoJugadoresService) => {
    expect(service).toBeTruthy();
  }));
});
