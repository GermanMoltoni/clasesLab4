import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ListarJugadoresComponent } from './listar-jugadores.component';

describe('ListarJugadoresComponent', () => {
  let component: ListarJugadoresComponent;
  let fixture: ComponentFixture<ListarJugadoresComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ListarJugadoresComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ListarJugadoresComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
