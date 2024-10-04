import wexpect
import sys
child = wexpect.spawn('cmd.exe')
child.expect('>')
child.sendline('dir')
child.expect('>')
print(child.before)
child.sendline('exit')