import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SingleConsoleComponent } from './single-console.component';

describe('SingleConsoleComponent', () => {
  let component: SingleConsoleComponent;
  let fixture: ComponentFixture<SingleConsoleComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SingleConsoleComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SingleConsoleComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
