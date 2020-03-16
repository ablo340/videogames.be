import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ConsoleFormPage } from './console-form.page';

describe('ConsoleFormPage', () => {
  let component: ConsoleFormPage;
  let fixture: ComponentFixture<ConsoleFormPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ConsoleFormPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ConsoleFormPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
