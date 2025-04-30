import subprocess
import sys

def get_outdated_packages():
    result = subprocess.run([sys.executable, '-m', 'pip', 'list', '--outdated', '--format=freeze'], capture_output=True, text=True)
    packages = result.stdout.splitlines()
    return [pkg.split('==')[0] for pkg in packages]

def upgrade_package(package):
    subprocess.run([sys.executable, '-m', 'pip', 'install', '--upgrade', package])

def main():
    outdated_packages = get_outdated_packages()
    for package in outdated_packages:
        upgrade_package(package)

if __name__ == '__main__':
    main()