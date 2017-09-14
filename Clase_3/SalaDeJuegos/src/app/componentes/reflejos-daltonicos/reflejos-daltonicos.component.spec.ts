import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ReflejosDaltonicosComponent } from './reflejos-daltonicos.component';

describe('ReflejosDaltonicosComponent', () => {
  let component: ReflejosDaltonicosComponent;
  let fixture: ComponentFixture<ReflejosDaltonicosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ReflejosDaltonicosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ReflejosDaltonicosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
