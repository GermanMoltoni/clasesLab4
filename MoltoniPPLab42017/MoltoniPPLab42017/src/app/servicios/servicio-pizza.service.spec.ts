import { TestBed, inject } from '@angular/core/testing';

import { ServicioPizzaService } from './servicio-pizza.service';

describe('ServicioPizzaService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ServicioPizzaService]
    });
  });

  it('should be created', inject([ServicioPizzaService], (service: ServicioPizzaService) => {
    expect(service).toBeTruthy();
  }));
});
