import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MenuListarJugadoresComponent } from './menu-listar-jugadores.component';

describe('MenuListarJugadoresComponent', () => {
  let component: MenuListarJugadoresComponent;
  let fixture: ComponentFixture<MenuListarJugadoresComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MenuListarJugadoresComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MenuListarJugadoresComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
