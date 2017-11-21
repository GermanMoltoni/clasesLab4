import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FormAltaPersonaComponent } from './form-alta-persona.component';

describe('FormAltaPersonaComponent', () => {
  let component: FormAltaPersonaComponent;
  let fixture: ComponentFixture<FormAltaPersonaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FormAltaPersonaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FormAltaPersonaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
