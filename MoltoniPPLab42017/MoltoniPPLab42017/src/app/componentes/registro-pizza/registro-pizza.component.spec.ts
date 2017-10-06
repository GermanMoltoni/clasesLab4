import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { RegistroPizzaComponent } from './registro-pizza.component';

describe('RegistroPizzaComponent', () => {
  let component: RegistroPizzaComponent;
  let fixture: ComponentFixture<RegistroPizzaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ RegistroPizzaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(RegistroPizzaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
