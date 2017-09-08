import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MenuDeListadoComponent } from './menu-de-listado.component';

describe('MenuDeListadoComponent', () => {
  let component: MenuDeListadoComponent;
  let fixture: ComponentFixture<MenuDeListadoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MenuDeListadoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MenuDeListadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
