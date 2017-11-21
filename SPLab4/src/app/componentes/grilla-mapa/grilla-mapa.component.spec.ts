import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { GrillaMapaComponent } from './grilla-mapa.component';

describe('GrillaMapaComponent', () => {
  let component: GrillaMapaComponent;
  let fixture: ComponentFixture<GrillaMapaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ GrillaMapaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(GrillaMapaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
